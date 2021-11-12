import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { Layout } from 'antd';
import MapView from './components/MapView';
import Navbar from './components/Navbar';

const { Header, Footer, Sider, Content } = Layout;

class Maps extends Component {
  constructor() {
    super();
    this.state = {
      loading: false,
    };
  }

  render() {
    return (
      <div>
        <Content
          style={{
            margin: '0 16px 16px 16px',
            minHeight: `calc(100vh - 263px)`,
          }}
        >
          <div
            style={{
              padding: 24,
              background: '#fff',
              borderRadius: 5,
              boxShadow: '0 4px 20px 0 rgba(0, 0, 0, 0.05)',
            }}
          >
            <Navbar></Navbar>
            <MapView></MapView>
          </div>
        </Content>
      </div>
    );
  }
}

const mapStateToProps = (state) => ({
});

export default connect(mapStateToProps)(Maps);
