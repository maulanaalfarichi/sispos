/**
 * Author © 2016 Sulaeman <me@sulaeman.com>. All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE.txt file in the root directory of this source tree.
 */

import React, { Component, PropTypes } from 'react';
import Post from '../Post';
import Mapping from './Mapping';
import List from './List';
import Detail from './Detail';

class Area extends Component {

  static propTypes = {
    baseUrl: PropTypes.string.isRequired,
    territory: PropTypes.object.isRequired
  };

  constructor() {
    super();

    this.state = this.getDefaultState();
  }

  getDefaultState() {
    return {
      filter: {
        district: 'all',
        village: 'all',
        search: null
      },
      isDataLoaded: false,
      items: null,
      openDetailData: null
    };
  }

  render() {
    const villages = this.props.territory.villages.map((item) => {
      return (<option key={`village-${item.id}`} value={item.id}>{item.district} | {item.name}</option>);
    });

    return (
      <div className="area-container">
        <div className="portlet light">
          <div className="portlet-title">
            <div className="caption form">
              <div className="form-group form-md-line-input form-md-floating-label padding-top-0 margin-bottom-0">
                <div className="input-group">
                  <div className="input-group-control">
                    <select id="filter-village" className="form-control">
                      <option value="all">Semua Kecamatan | Kelurahan</option>
                      {villages}
                    </select>
                  </div>
                  <div className="input-group-control hidden">
                    <input type="text" id="filter-search" className="form-control" placeholder="Pencarian" />
                  </div>
                  <span className="input-group-btn btn-right">
                    <button type="button" className="btn red-sunglo" onClick={this.handleFilter.bind(this)}>
                      Filter
                    </button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <Mapping baseUrl={this.props.baseUrl}
           items={this.state.items} openDetail={this.handleOpenDetail.bind(this)} />
        </div>
        {this.getLoading()}
        <div className="row">
          <div className="col-sm-4">
            <Post baseUrl={this.props.baseUrl}
             filter={this.state.filter} />
          </div>
          <div className="col-sm-8">
            <List baseUrl={this.props.baseUrl}
             filter={this.state.filter}
             openDetail={this.handleOpenDetail.bind(this)}
             dataIsLoaded={this.handleDataIsLoaded.bind(this)}
             loadedData={this.handleLoadedData.bind(this)} />
          </div>
        </div>
        {this.getDetailData()}
      </div>
    );
  }

  handleOpenDetail(data) {
    this.setState({openDetailData: data});
  }

  handleDataIsLoaded() {
    this.setState({isDataLoaded: true});
  }

  handleCloseDetail() {
    this.setState({openDetailData: null});
  }

  handleFilter() {
    const districtId = 'all';

    const village = document.getElementById('filter-village');
    const villageId = village.options[village.selectedIndex].value;

    this.setState({
      filter: {
        district: districtId,
        village: villageId,
        search: document.getElementById('filter-search').value
      },
      isDataLoaded: false
    });
  }

  handleLoadedData(items) {
    if (items.length == 0 && this.state.items.length > 0) {
      this.setState({items: items});
    } else {
      if (!_.isMatch(this.state.items, items)) {
        this.setState({items: items});
      }
    }
  }

  getDetailData() {
    if (this.state.openDetailData == null) {
      return null;
    }

    return <Detail baseUrl={this.props.baseUrl}
     data={this.state.openDetailData}
      onClose={this.handleCloseDetail.bind(this)} />
  }

  getLoading() {
    return ! this.state.isDataLoaded ? (
      <div className="padding-20 text-center">
        <img src={`${this.props.baseUrl}/assets/img/loading-spinner-grey.gif`} className="loading" /> 
        <span>&nbsp;&nbsp;Mengunduh data... </span>
      </div>
    ) : null;
  }

}

export default Area;
