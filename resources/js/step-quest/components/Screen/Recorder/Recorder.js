import React from 'react'
import './Recorder.css';
import AudioReactRecorder, { RecordState } from 'audio-react-recorder'
import 'audio-react-recorder/dist/index.css'
import { Button } from 'react-bootstrap';

class Recorder extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            recordState: null,
            audioData: null
        }
    }

    start = () => {
        this.setState({
            recordState: RecordState.START
        })
    }

    pause = () => {
        this.setState({
            recordState: RecordState.PAUSE
        })
    }

    stop = () => {
        this.setState({
            recordState: RecordState.STOP
        })
    }

    onStop = (data) => {
        this.setState({
            audioData: data
        })
        console.log('onStop: audio data', data)
    }

    render() {
        const { recordState } = this.state

        return (
            <div className=" Recoder flex-c-m flex-column">
                <div className="Recoder_title mb-3"> {this.props.data.title}</div>
                <div className="flex-c-m recording">
                    <AudioReactRecorder
                        state={recordState}
                        onStop={this.onStop}
                        backgroundColor='rgb(255,255,255)'
                    />
                    { !this.state.recordState ? <div className="preview-audio"></div> : undefined}
                </div>
                {this.state.audioData ? <div>
                    <audio
                        id='audio'
                        controls
                        src={this.state.audioData ? this.state.audioData.url : null}
                    ></audio>
                </div> : undefined}
                <div className="btn-control flex-c-m justify-content-between">
                    <Button variant="success" onClick={this.start}>
                        Start
                    </Button>
                    <Button variant="warning" onClick={this.pause}>
                        Pause
                    </Button>
                    <Button variant="danger" onClick={this.stop}>
                        Stop
                    </Button>
                </div>

            </div>
        )
    }
}

export default Recorder;