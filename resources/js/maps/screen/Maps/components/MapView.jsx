import React, { useState, useEffect, useRef, useCallback } from "react";
import { useSelector, useDispatch } from "react-redux";
import GoogleMap from "google-map-react";
import GpsIcon from "../../../components/icons";
import { AimOutlined } from "@ant-design/icons";
import Marker from "../../../components/Marker";
import { getGeolocation, getGps, getKm, setZooCenter } from "../action";
import select from "../../../utils/select";
import { getDistanceFromLatLonInKm } from "../../../utils/util";
import { ToastContainer, toast } from "react-toastify";
import "react-toastify/dist/ReactToastify.css";
import { message, Button } from "antd";
import GoogleMapReact from "google-map-react";
import Polyline from "./Polyline";
import { Modal } from "rsuite";

const MapView = (props) => {
    const { maps, gps, isGps, ganNhat, km, center, zoom, info, listPlayer } =
        useSelector((state) => ({
            maps: select(state, "mapsReducer", "maps"),
            gps: select(state, "mapsReducer", "gps"),
            isGps: select(state, "mapsReducer", "isGps"),
            ganNhat: select(state, "mapsReducer", "ganNhat"),
            km: select(state, "mapsReducer", "km"),
            center: select(state, "mapsReducer", "center"),
            zoom: select(state, "mapsReducer", "zoom"),
            info: select(state, "mapsReducer", "info"),
            listPlayer: select(state, "mapsReducer", "listPlayer"),
        }));

    const dispatch = useDispatch();

    useEffect(() => {
        const intervalGps = setInterval(() => {
            dispatch(getGps(navigator));
        }, 777);
        return () => clearInterval(intervalGps);
    }, []);

    useEffect(() => {
        const interval = setInterval(() => {
            dispatch(getKm());
        }, 3500);
        return () => clearInterval(interval);
    }, []);

    useEffect(() => {
        const test = setInterval(() => {
            // message.info(,{ marginTop: 50});
            if (km < 30) {
                message.loading({
                    content: `${ganNhat.name} cách bạn ${
                        (km.toFixed(4) * 10000) % 1000
                    } m`,
                    style: { marginTop: 60 },
                    duration: 4,
                });
            }
        }, 11111);
        return () => clearInterval(test);
    }, [ganNhat]);

    const onGetGps = () => {
        dispatch(getGps(navigator));
    };

    const changeMap = ({ center, zoom, bounds }) => {
        dispatch(setZooCenter(zoom, center));
    };

    const [mapApi, setMapApi] = useState(null);
    const [mapsApi, setMapsApi] = useState(null);
    const [mapsLoaded, setMapsLoaded] = useState(false);

    const onMapLoaded = (mapLoad, mapsLoad) => {
        if (maps.length > 0 && mapsLoaded === false) {
            setMapsLoaded(true);
            setMapApi(mapLoad);
            setMapsApi(mapsLoad);
        }
    };

    const afterMapLoadChanges = () => {
        if (
            mapsLoaded &&
            mapsApi !== null &&
            mapApi !== null &&
            maps.length > 0
        ) {
            return (
                <div>
                    <Polyline map={mapApi} maps={mapsApi} markers={maps} />
                </div>
            );
        }
    };

    const [open, setOpen] = React.useState(false);
    const handleOpen = () => setOpen(true);
    const handleClose = () => setOpen(false);

    return (
        <div
            style={{
                height: window.innerHeight - 72,
                width: "100%",
                position: "absolute",
            }}
        >
            <GoogleMap
                path={maps}
                bootstrapURLKeys={{
                    key: "AIzaSyB-lfJYx98EARbL-SCEWy9TU59USvM3QZY",
                }}
                options={{
                    gestureHandling: "greedy",
                    disableDefaultUI: true,
                    disableDoubleClickZoom: true,
                    streetViewControl: false,
                    clickableIcons: false,
                    fullscreenControl: false,
                    style: [
                        {
                            featureType: "poi",
                            stylers: [{ visibility: "off" }],
                        },
                        {
                            featureType: "transit",
                            stylers: [{ visibility: "off" }],
                        },
                        {
                            featureType: "landscape",
                            stylers: [{ visibility: "off" }],
                        },
                    ],
                }}
                center={center}
                zoom={zoom}
                gestureHandling={false}
                onChange={changeMap}
                onGoogleApiLoaded={({ map, maps }) => onMapLoaded(map, maps)}
                yesIWantToUseGoogleMapApiInternals={true}
            >
                {mapsLoaded ? afterMapLoadChanges() : null}

                {maps.map((item, index) => {
                    let detail = item;
                    detail.index = index;
                    return (
                        <Marker
                            zoom={zoom}
                            key={index}
                            detail={detail}
                            lat={item.lat}
                            lng={item.lng}
                            onClickMarker={props.onShowDetail}
                        />
                    );
                })}
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
                    style={{
                        fontSize: "20px",
                        color: !isGps ? "#7DCBE2" : "#08c",
                    }}
                    onClick={onGetGps}
                />
            </div>
            <div
                onClick={handleOpen}
                style={{
                    position: "relative",
                    float: "right",
                    top: -window.innerHeight + 82,
                    left: 20,
                    height: 40,
                    width: 70,
                    borderRadius: 5,
                    backgroundColor: "#FFF",
                    display: "inline-flex",
                    justifyContent: "center",
                    alignItems: "center",
                    boxShadow:
                        "rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px, rgba(17, 17, 26, 0.1) 0px 24px 80px",
                }}
            >
                <h6>
                    {!info && maps.length !== 0
                        ? `0 / ${maps.length}`
                        : `${info?.count} / ${maps.length}`}
                </h6>
            </div>
            <Modal
                full
                open={open}
                onClose={handleClose}
                style={{ marginTop: "10vh" }}
            >
                <Modal.Header>
                    <Modal.Title>
                        <h5>Ranking</h5>
                    </Modal.Title>
                </Modal.Header>
                <Modal.Body>
                    <div style={{ height: "40vh" }}>
                        {listPlayer.map((player, index) => (
                            <div
                                key={index}
                                style={{
                                    padding: 15,
                                    marginTop: 10,
                                    color: "#FFF",
                                    borderRadius: 10,
                                    backgroundColor:
                                        player.userId === info.userId
                                            ? "#1F7D1F"
                                            : "#5E219A",
                                }}
                            >
                                <h6>
                                    {`Top ${index + 1} :  ${player.username}`}
                                </h6>
                                <h6>
                                    {`Đã check in ${player?.count} / ${maps.length} vị trí`}
                                </h6>
                            </div>
                        ))}
                    </div>
                </Modal.Body>
                <Modal.Footer>
                    <h6>
                        {`Bạn đã đã check in tại : ${info?.count} / ${maps.length} vị trí`}
                    </h6>
                </Modal.Footer>
            </Modal>
        </div>
    );
};

export default MapView;
