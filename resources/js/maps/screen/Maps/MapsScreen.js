import React, { Component } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Layout } from "antd";
import MapView from "./components/MapView";
import MarkerDetail from "./components/MarkerDetail";
import { Button } from "rsuite";
import { getMaps } from "./action";
import select from '../../utils/select';
import toJs from '../../hoc/ToJS';

const { Header, Footer, Sider, Content } = Layout;

class MapsScreen extends Component {
  constructor() {
    super();
    this.state = {
      loading: false,
      isShowDetail: false,
      detail: null,
    };
  }
  onShowDetail = (e, detail) => {
    if(!e){
      this.props.getMaps(window.location.search.replace("?tr=", ""));
    }
    this.setState({ isShowDetail: e, detail: detail });
  };

  componentDidMount() {
    this.props.getMaps(window.location.search.replace("?tr=", ""));
  }

  render() {
    console.log(this.props.maps);
    return (
      <div
        style={{
          marginTop: -23,
          minHeight: `calc(${window.innerHeight} - 263px)`,
          backgroundColor: "#fff",
        }}
      >
        <MapView onShowDetail={this.onShowDetail} />
        <MarkerDetail
          isShowDetail={this.state.isShowDetail}
          onShowDetail={this.onShowDetail}
          detail={this.state.detail}
        />
      </div>
    );
  }
}

const mapStateToProps = (state) => ({
});

const mapDispatchToProps = (dispatch) => ({
  getMaps: (trId) => dispatch(getMaps(trId)),
});

export default toJs(
  connect(mapStateToProps, mapDispatchToProps)(toJs(MapsScreen)),
);