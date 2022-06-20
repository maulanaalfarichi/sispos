<?php

namespace App\Http\Controllers\Api\v1;

/*
 * Author: Sulaeman <me@sulaeman.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Services\Area as AreaService;
use App\Services\File as FileService;
use App\Presenter\Api\Area\Area as AreaPresenter;
use App\Presenter\Api\Area\Status as StatusPresenter;
use App\Presenter\Api\File as FilePresenter;


class Area extends Controller
{
    use Helpers;

    /**
     * Return areas.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $limit = (int) $request->get('limit', 10);
        $page = (int) $request->get('page', 1);
        $district = trim($request->get('district', ''));
        $village = trim($request->get('village', ''));
        $search = trim($request->get('search', ''));
        $include = trim($request->get('include', ''));

        if ($district == 'all') {
            $district = '';
        }

        if ($village == 'all') {
            $village = '';
        }

        $result = $this->getService()->search([
            'district_id' => $district,
            'village_id'  => $village,
        ], $page, $limit);

        return $this->response->paginator(
            $result,
            new AreaPresenter,
            [
                'include' => $include,
            ]
        );
    }

    /**
     * Return area photos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhotos($id)
    {
        $result = $this->getService()->getPhotos($id);

        return $this->response->collection(
            $result,
            new FilePresenter
        );
    }

    /**
     * Return area statuses.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                   $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllStatuses(Request $request, $id = 0)
    {
        $limit = (int) $request->get('limit', 10);
        $page = (int) $request->get('page', 1);
        $include = trim($request->get('include', ''));

        $result = $this->getService()->searchStatus([
            'area_id' => $id,
        ], $page, $limit);

        return $this->response->paginator(
            $result,
            new StatusPresenter,
            [
                'include' => $include,
            ]
        );
    }

    /**
     * Return the service instance.
     *
     * @return \App\Services\Area
     */
    private function getService()
    {
        return new AreaService();
    }

    /**
     * Return the file service instance.
     *
     * @return \App\Services\File
     */
    private function getFileService()
    {
        $service = new FileService();

        return $service;
    }
}
