import { combineReducers } from 'redux';
import Auth from './Auth';
import Gps from './Gps';
import persistStore from './persistStore';

const RootReducer = combineReducers({ Auth, Gps, persistStore });

export default RootReducer;