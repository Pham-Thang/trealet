import React, { useEffect, useRef, useState } from "react";
import PropTypes from "prop-types";
import { connect, useDispatch, useSelector } from "react-redux";
import { Layout } from "antd";
import MapView from "./components/MapView";
import MarkerDetail from "./components/MarkerDetail";
import { Button } from "rsuite";
import { getMaps } from "./action";
import select from "../../utils/select";
import toJs from "../../hoc/ToJS";
import ActionSheet, { ActionSheetRef } from "actionsheet-react";

const { Header, Footer, Sider, Content } = Layout;

const MapsScreen = () => {
  const { maps, gps, isGps, ganNhat, km } = useSelector((state) => ({
    maps: select(state, "mapsReducer", "maps"),
    gps: select(state, "mapsReducer", "gps"),
    isGps: select(state, "mapsReducer", "isGps"),
    ganNhat: select(state, "mapsReducer", "ganNhat"),
    km: select(state, "mapsReducer", "km"),
  }));

  const dispatch = useDispatch();

  const [isShowDetail, setIsShowDetail] = useState(false);
  const [detail, setDetail] = useState(null);
  const ref = useRef();
 
  const trId =window.location.search.replace("?tr=", "");

  useEffect(() => {
    dispatch(getMaps(trId));
  }, []);

  const onShowDetail = (e, detail) => {
    if (!e) {
      dispatch(getMaps(trId));
      ref.current.close();
    } else {
      ref.current.open();
      setDetail(detail);
    }
    setIsShowDetail(e);
  };

  const close = () =>{
    dispatch(getMaps(trId));
  }

  return (
    <div
      style={{
        marginTop: -23,
        minHeight: `calc(${window.innerHeight} - 263px)`,
        backgroundColor: "#fff",
      }}
    >
      <MapView onShowDetail={onShowDetail} />
      <ActionSheet
        ref={ref}
        sheetStyle={{
          borderTopLeftRadius: 18,
          borderTopRightRadius: 18,
        }}
        sheetStyle={{ height: "76vh"}}
        bgStyle={{
          backgroundColor: "rgba(1, 1, 1, 0.8)",
        }}
        sheetTransition={'transform 0.2s ease-in-out'}
        onClose={close}
      >
        <MarkerDetail
          isShowDetail={isShowDetail}
          onShowDetail={onShowDetail}
          detail={detail}
        />
      </ActionSheet>
    </div>
  );
};

export default toJs(MapsScreen);
