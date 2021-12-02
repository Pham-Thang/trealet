import React, { Component } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Layout } from "antd";
import MapView from "./components/MapView";
import MarkerDetail from "./components/MarkerDetail";

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

  onShowDetail = (e,detail) => {
    this.setState({ isShowDetail: e ,detail: detail});
  }

  render() {
    return (
      <div>
        <Content
          style={{
            marginTop: -23,
            minHeight: `calc(100vh - 263px)`,
            backgroundColor: "#fff",
          }}
        >
          <div>
            <MapView 
              onShowDetail={this.onShowDetail}
            />
            <MarkerDetail
              isShowDetail={this.state.isShowDetail}
              onShowDetail={this.onShowDetail}
              detail={this.state.detail}
            />
            
          </div>
        </Content>
      </div>
    );
  }
}

const mapStateToProps = (state) => ({
  defaultGps: state.Gps.defaultGps,
  gps: state.Gps.gps
});

export default connect(mapStateToProps)(MapsScreen);
