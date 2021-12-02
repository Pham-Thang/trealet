import * as ActionTypes from '../action-types/gps';
import { notification } from 'antd';
import { apiCall } from '../../utils/api';
import { API_URLS } from '../../config/api';
import axios from 'axios';

export const getGeolocation = (payload) => async (dispatch) => {
        const res = await axios.get('https://61a4fe6f4c822c0017042039.mockapi.io/v1')
        console.log(res.data);
    dispatch({
      type: ActionTypes.GET_GEOLOCATION,
    });
    // const { response, error } = await apiCall({ ...api });
    console.log('log res',response);
    if (!error && response.status === 200 && response.data.success === true) {
      dispatch({
        type: ActionTypes.GET_GEOLOCATION_SUCCES,
        payload: response.data.data,
      });
    } else {
      dispatch({
        type: ActionTypes.GET_GEOLOCATION_FAIL,
      });
    }
};

export const getGps = (gps) => async (dispatch) => {
    dispatch({
        type: ActionTypes.GET_GPS,
      });
      const geolocation = await new Promise((resolve, reject) => {
        gps.geolocation.getCurrentPosition(
            (success) => {
              console.log("Latitude is :", success.coords.latitude);
              console.log("Longitude is :", success.coords.longitude);
              let payload = {
                  lat: success.coords.latitude,
                  lng: success.coords.longitude
              }
              dispatch({
                type: ActionTypes.GET_GPS_SUCCES,
                payload,
              });
            },
            (error) => {
              console.log(error.message);
              alert(error.message);
              dispatch({
                type: ActionTypes.GET_GPS_FAIL,
              });
            }
        );
      });

  
    if (!error && response.status === 200 && response.data.success === true) {
     
    } else {
     
    }
};

