import React from "react";
import ReactDOM from "react-dom";
import {
  BrowserRouter as Router,
  Switch,
  Route,
  useLocation,
} from "react-router-dom";
import { Provider } from "react-redux";
import store from "./store";
import * as action from "./store/actions";
import Maps from "./screens/Maps/Maps";
import "./App.css";

store.dispatch(action.authCheck());

ReactDOM.render(
  <Provider store={store}>
    <Router>
      <Switch>
        <Route path="/maps" component={Maps} />
      </Switch>
    </Router>
  </Provider>,
  document.getElementById("maps")
);
