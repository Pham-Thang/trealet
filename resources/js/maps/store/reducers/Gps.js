import * as ActionTypes from "../action-types/gps";

const initialState = {
  isFetching: false,
  isGps: false,
  gps: null,
  defaultGps: null,
};

const Gps = (state = initialState, { type, payload = null }) => {
  switch (type) {
    case ActionTypes.GET_GEOLOCATION:
      return state;
    case ActionTypes.GET_GEOLOCATION_SUCCES:
      return state;
    case ActionTypes.GET_GEOLOCATION_FAIL:
      return state;
    case ActionTypes.GET_GPS:
      return state;
    case ActionTypes.GET_GPS_SUCCES:
        let tmp = state;
        tmp.gps = payload;
        tmp.isGps = true;
      return tmp;
    case ActionTypes.GET_GPS_FAIL:
      return state;
    default:
      return state;
  }
};

export default Gps;
