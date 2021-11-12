import React, { useState } from "react"
import GoogleMapReact, { Map, InfoWindow, Marker, GoogleApiWrapper } from 'google-map-react';
import { UserOutlined } from '@ant-design/icons';
import { Avatar, Image,Drawer } from 'antd';


const AnyReactComponent = ({ text }) => <div><img src="https://img.icons8.com/color/48/000000/marker--v1.png"/></div>;

export default function MapView(props) {

    const [geolocation, setGeolocation] = useState(navigator.geolocation.getCurrentPosition(function (position) {
        let temp = { lat: position.coords.latitude, lng: position.coords.longitude }
        return temp;
    }))

    const [markers, setMarkers] = useState([]);

    console.log(navigator.geolocation.getCurrentPosition(function (position) {
        console.log("Latitude is :", position.coords.latitude);
        console.log("Longitude is :", position.coords.longitude);
    }));

    const addMarker = (location) => {
        const lat = location.lat;
        const lng = location.lng;
        let temp = markers;
        temp.push({
            title: "hahah",
            name: "",
            position: { lat, lng }
        });
        setMarkers(temp);
        console.log(markers);
    }
    console.log(markers);

    const defaultProps = {
        center: {
            lat: 20.8642373,
            lng: 105.9164407,
        },
        zoom: 11
    };


    return (
        <div className="Maps" style={{ marginTop: 20 }}>
            <div style={{ height: '90vh', width: '100%' }}>
           
                <GoogleMapReact
                    bootstrapURLKeys={{
                        key: "AIzaSyB-lfJYx98EARbL-SCEWy9TU59USvM3QZY",
                    }}
                    defaultCenter={defaultProps.center}
                    defaultZoom={defaultProps.zoom}
                    onClick={addMarker}
                >
                    <AnyReactComponent
                        lat={20.861987861333986}
                        lng={105.88795678670286}
                        text="My Marker"
                    />
                    {markers.map((marker, index) => (
                        <div>
                            {console.log(111.3, marker)}
                            <AnyReactComponent
                                lat={marker.position.lat}
                                lng={marker.position.lng}
                                text="My Marker"
                            />
                        </div>

                    ))}
                </GoogleMapReact>
            </div>

        </div>
    )
}
