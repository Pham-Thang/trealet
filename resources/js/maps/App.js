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
import MapsScreen from "./screen/Maps/MapsScreen";
import "./App.css";
import "rsuite/dist/rsuite.min.css";

store.dispatch(action.authCheck());

ReactDOM.render(
  <Provider store={store}>
    <Router>
      <Switch>
        <Route path="/maps" component={MapsScreen} />
      </Switch>
    </Router>
  </Provider>,
  document.getElementById("maps")
);
