import React, { Component } from "react";
import "./Picture.css";
class ScreenPicture extends Component {
  constructor(props) {
    super(props);
    var tr_id = new URL(window.location.href).searchParams.get("tr");
    this.state = {
      tr_id,
    };
  }
  render() {
    var src = `${window.location.origin}/input-picture?tr_id=${this.state.tr_id}&nij=3`;
    return (
      <div>
        <div className="mt-4 mb-4 Picture_title">{this.props.data.hint}</div>
        <div>
          <iframe
            style={{ position: "relative", height: "300px", width: "80%" }}
            src={src}
            title="abc"
            frameBorder="0"
            allow="microphone"
          />
        </div>
      </div>
    );
  }
}

export default ScreenPicture;
