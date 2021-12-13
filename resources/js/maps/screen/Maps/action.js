import { API_URLS } from "../../config/api";
import { TYPE } from "../../config/actions";
import { apiCall } from "../../utils/api";
import select from "../../utils/select";
import { message, Button } from "antd";
import { getDistanceFromLatLonInKm } from "../../utils/util";

export const getMaps = (trId) => async (dispatch) => {
  dispatch({
    type: TYPE.GET_MAPS,
  });
  const params = {
    tr: trId,
  };
  const api = API_URLS.MAPS.getMaps();
  const { response, error } = await apiCall({ ...api, params });
  if (!error && response.status === 200) {
    const json = JSON.parse(response.data.json);
    const maps = json.item;
    maps.map((item, index) => {
      response.data.played.forEach((playedItem) => {
        if (index === playedItem.no_in_json) {
          item.played = true;
          if (playedItem.type === "audio" || playedItem.type === "picture") {
            item.data = playedItem.data;
          }
          if (playedItem.type === "qr" || playedItem.type === "form") {
            item.data = JSON.parse(playedItem.data);
          }
        } else {
          item.played = false;
          item.data = null;
        }
      });
      return item;
    });
    dispatch({
      type: TYPE.GET_MAPS_SUCCES,
      payload: maps,
    });
  } else {
    dispatch({
      type: TYPE.GET_MAPS_FAIL,
    });
  }
};

export const getGeolocation = (payload) => async (dispatch) => {
  const res = await axios.get("https://61a4fe6f4c822c0017042039.mockapi.io/v1");
  console.log(res.data);
  dispatch({
    type: TYPE.GET_GEOLOCATION,
  });
  // const { response, error } = await apiCall({ ...api });
  console.log("log res", response);
  if (!error && response.status === 200 && response.data.success === true) {
    dispatch({
      type: TYPE.GET_GEOLOCATION_SUCCES,
      payload: response.data.data,
    });
  } else {
    dispatch({
      type: TYPE.GET_GEOLOCATION_FAIL,
    });
  }
};

export const getGps = (gps) => async (dispatch) => {
  dispatch({
    type: TYPE.GET_GPS,
  });
  const geolocation = await new Promise((resolve, reject) => {
    gps.geolocation.getCurrentPosition(
      (success) => {
        let payload = {
          lat: success.coords.latitude,
          lng: success.coords.longitude,
        };
        dispatch({
          type: TYPE.GET_GPS_SUCCES,
          payload,
        });
      },
      (error) => {
        console.log(error.message);
        dispatch({
          type: TYPE.GET_GPS_FAIL,
        });
      }
    );
  });
};

export const getKm = () => async (dispatch, getState) => {
  dispatch({
    type: TYPE.GET_KM,
  });
  const state = getState();
  const maps = select(state, "mapsReducer", "maps");
  const gps = select(state, "mapsReducer", "gps");
  let tmp = 200;
  let ganNhat = null;
  var indexMin = -1;
  if (gps) {
    maps.forEach((item, index) => {
      let km = getDistanceFromLatLonInKm(item.lat, item.lng, gps.lat, gps.lng);
      console.log(item.name + "-----" + km + "km");
      if( tmp > km) indexMin = index; tmp = km
    });
  const vitri = await indexMin;
  dispatch({
    type: TYPE.GET_KM_SUCCES,
    payload: {
      ganNhat: maps[vitri],
      khoangCach: tmp,
    },
  });
  }

};
