import React from "react";
import "./Recorder.css";
import AudioReactRecorder, { RecordState } from "audio-react-recorder";
import "audio-react-recorder/dist/index.css";
import { Button } from "react-bootstrap";

class Recorder extends React.Component {
  constructor(props) {
    super(props);
    var tr_id = new URL(window.location.href).searchParams.get("tr");
    this.state = {
      tr_id,
    };
  }
  render() {
    var src = `${window.location.origin}/input-audio?tr_id=${this.state.tr_id}&nij=1`;
    return (
      <div>
        <div className="mt-4 mb-4 Recoder_title">{this.props.data.hint}</div>
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

export default Recorder;
