import React, { Component } from "react";
import "./ScreenQr.css";
class ScreenQr extends Component {
  constructor(props) {
    super(props);
    var tr_id = new URL(window.location.href).searchParams.get("tr");
    this.state = {
      tr_id,
    };
  }

  render() {
    var src = `${window.location.origin}/input-qr?tr_id=${this.state.tr_id}&nij=5`;
    return (
      <div>
        <div className="Qr_Title mt-4">
          <p> {this.props.data.hint} </p>{" "}
        </div>{" "}
        <div>
          <iframe
            style={{ position: "relative", height: "300px", width: "80%" }}
            src={src}
            title="abc"
            frameBorder="0"
            allow="microphone"
            className="iframe"
          />
        </div>{" "}
      </div>
    );
  }
}
export default ScreenQr;
