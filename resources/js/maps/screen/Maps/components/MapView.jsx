import React, { useState, useEffect } from "react";
import { useSelector, useDispatch } from "react-redux";
import GoogleMap from "google-map-react";
import GpsIcon from "../../../components/icons";
import { AimOutlined } from "@ant-design/icons";
import Marker from "../../../components/Marker";
import { getGeolocation, getGps } from "../../../store/actions/gps";
import Gps from "../../../store/reducers/Gps";
import vnu from '../../../img/vnu.jpg'; // Tell webpack this JS file uses this image
import uet from '../../../img/uet.jpg'; // Tell webpack this JS file uses this image
import ulis from '../../../img/ulis-logo.png'; // Tell webpack this JS file uses this image
import g2 from '../../../img/G2.jpg';
import vnu1 from '../../../img/ktx_mt.jpg';
import ulis1 from '../../../img/ulis1.jpeg'; // Tell webpack this JS file uses this image


const arr = [
  {
    title: "xoms 1",
    lat: 20.858310677546147,
    lng: 105.9147626433391,
  },
  {
    title: "xom2",
    lat: 20.855614138080107,
    lng: 105.91797246680144,
  },
  {
    title: "xom 3",
    lat: 20.86621072857512,
    lng: 105.91786154584406,
  },
  {
    title: "xom 4",
    lat: 20.863483854324585,
    lng: 105.91498474387205,
  },
];

const arr2 = [
  {
    title: "Đại học Quốc gia Hà Nội",
    lat: 21.03768268860002,
    lng: 105.78168530206932,
    img: [
      {
        title: "",
        src: vnu,
      },
      {
        title: "",
        src: vnu1,
      },
    ],
    discreption:
      "Đại học Quốc gia Hà Nội là một trong hai hệ thống Đại học Quốc gia của Việt Nam, được đặt dưới sự chỉ đạo trực tiếp của Chính phủ, giữ vai trò quan trọng trong hệ thống giáo dục của Việt Nam.",
  },
  {
    title: "Trường Đại học Ngoại ngữ, Đại học Quốc gia Hà Nội",
    lat: 21.039223283888763,
    lng: 105.78199913071451,
    img: [
      {
        title: "",
        src: ulis,
      },
      {
        title: "",
        src: ulis1,
      },
    ],
    discreption:
      "Trường Đại học Ngoại ngữ, là một trường đại học thành viên của Đại học Quốc gia Hà Nội, được xếp vào nhóm trường đại học trọng điểm quốc gia Việt Nam. Đây được đánh giá là trường đại học đầu ngành và có lịch sử lâu đời nhất về đào tạo và giảng dạy ngôn ngữ tại Việt Nam.",
  },
  {
    title: "Trường Đại học Công nghệ, Đại học Quốc gia Hà Nội",
    lat: 21.038272480898943,
    lng: 105.78283957815938,
    img: [
      {
        title: "",
        src: uet,
      },
      {
        title: "",
        src: g2,
      },
    ],
    discreption:
      "Trường Đại học Công nghệ (tiếng Anh: VNU University of Engineering and Technology; viết tắt là: UET) là một trường đại học thành viên của Đại học Quốc gia Hà Nội, được thành lập vào năm 2004[3], địa chỉ tại 144 Xuân Thủy, quận Cầu Giấy, Hà Nội, trong khuôn viên Đại học Quốc gia Hà Nội khu vực Cầu Giấy cùng với các trường thành viên như Trường Đại học Ngoại ngữ, Trường Đại học Kinh tế, Trường Đại học Y Dược, Khoa Luật,...",
  },
];
const MapView = (props) => {
  const { defaultGps, gps } = useSelector((state) => ({
    defaultGps: state.Gps.defaultGps,
    gps: state.Gps.gps,
  }));
  const [zoom, setZoom] = useState(16);
  const [size, setSize] = useState(50);

  const [geolocation, setGeolocation] = useState(null);
  const [center, setCenter] = useState({ lat: 21.038272480898943, lng: 105.78283957815938 });
  const [mapRef, setMapRef] = useState(null);
  const dispatch = useDispatch();
  useEffect(() => {
    if (gps !== null) {
      setGeolocation(gps);
    }
  }, []);

  const onGetGps = () => {
    dispatch(getGps(navigator));
    let x = gps;
    setCenter(x);
  };

  const onZoom = (e) => {
    let metersPerPx =
      (156543.03392 * Math.cos((e.center.lat * Math.PI) / 180)) /
      Math.pow(2, e.zoom);
    console.log(e);
    setZoom(e.zoom);
    setSize(size);
  };

  return (
    <div style={{ height: "77vh", width: "100%", borderRadius: 5 }}>
      <GoogleMap
        bootstrapURLKeys={{
          key: "AIzaSyB-lfJYx98EARbL-SCEWy9TU59USvM3QZY",
        }}
        options={{
          gestureHandling: "greedy",
          disableDefaultUI: true,
          fullscreenControl: false,
          style: [
            {
              featureType: "poi",
              elementType: "labels",
              stylers: [{ visibility: "off" }],
            },
          ],
        }}
        onLoad={(map) => setMapRef(map)}
        center={center}
        zoom={zoom}
        gestureHandling={false}
        onChange={onZoom}
        onClick={(e) => {
          console.log(e);
        }}
      >
        {arr2.map((item) => (
          <Marker
            zoom={zoom}
            detail={item}
            lat={item.lat}
            lng={item.lng}
            onClickMarker={props.onShowDetail}
          />
        ))}
        {gps !== null ? <GpsIcon lat={gps.lat} lng={gps.lng} /> : null}
      </GoogleMap>
      <div
        style={{
          position: "relative",
          float: "right",
          top: -40,
          left: -15,
          height: 30,
          width: 30,
          borderRadius: 5,
          backgroundColor: "#FFF",
          display: "inline-flex",
          justifyContent: "center",
          alignItems: "center",
          boxShadow:
            "rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px",
        }}
      >
        <AimOutlined
          style={{ fontSize: "20px", color: "#08c" }}
          onClick={onGetGps}
        />
      </div>
    </div>
  );
};

export default MapView;
