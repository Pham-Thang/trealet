import { fromJS } from 'immutable';
import { TYPE } from '../../config/actions';

const mapsState = fromJS({
  isFetching: false,
  maps: [],
  gps: null,
  isFetchingGps: false,
  isGps: false,
  ganNhat: null,
  km: 0,
});

const maps = (state = mapsState, action) => {
  switch (action.type) {
    case TYPE.GET_MAPS: {
      return state.merge({
        isFetching: true,
      });
    }
    case TYPE.GET_MAPS_FAIL: {
      return state.merge({
        isFetching: false,
      });
    }
    case TYPE.GET_MAPS_SUCCES: {
      console.log(action.payload);
      return state.merge({
        maps: action.payload,
        isFetching: false,
      });
    }
    case TYPE.GET_GPS: {
      return state.merge({
        isFetchingGps: true,
      });
    }
    case TYPE.GET_GPS_FAIL: {
      return state.merge({
        isFetchingGps: false,
      });
    }
    case TYPE.GET_GPS_SUCCES: {
      if(action.payload !== state.gps) {
        return state.merge({
          gps: action.payload,
          isFetching: false,
          isGps: true,
        });
      }else {
        return state.merge({
          isFetching: false,
          isGps: true,
        });
      }
    }
    case TYPE.GET_KM: 
      return state.merge({
        isFetching: false,
      });
    case TYPE.GET_KM_FAIL:
      return state.merge({
        isFetching: false,
      });
    case TYPE.GET_KM_SUCCES: 
      return state.merge({
        isFetching: false,
        ganNhat: action.payload.ganNhat,
        km: action.payload.khoangCach,
      });
    default:
      return state;
  }
};
export default maps;
