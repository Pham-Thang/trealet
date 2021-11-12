import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Switch } from 'react-router-dom';
import { Provider } from 'react-redux';
import store from './store';
import * as action from './store/actions';
import Maps from './screens/Maps/Maps'
import './App.css';

store.dispatch(action.authCheck());

ReactDOM.render(
  <Provider store={store}>
    <Router>
      <Switch>
        {/* <Routes /> */}
        <Maps></Maps>
      </Switch>
    </Router>
  </Provider>,
  document.getElementById('app'),
);
