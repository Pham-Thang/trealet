import React, { Component } from "react";
import axios from "axios";
import { Button } from "react-bootstrap";
// import App from "../../App";
import './Game.css';
import ScreenDisplay from "../Screen/Display/ScreenDisplay";
import ScreenQr from "../Screen/Qr/ScreenQr";
import ScreenResult from "../Screen/Result/ScreenResult";
import { withRouter } from "react-router-dom";
import Answer from "../Screen/Question/Answer";
import QrReader from "react-qr-reader";
import Recorder from "../Screen/Recorder/Recorder";
class ContentGame extends Component {
    constructor(props) {
        super(props);
        this.state = {
            // isShow : false
            currentIndex: 0,
            product: [],
            score: 0,
            result: false
        }
        this.onClickNext = this.onClickNext.bind(this)
        this.onClickPrev = this.onClickPrev.bind(this)
        this.showResult = this.showResult.bind(this)
    }
    componentDidMount() {
       this.setState({product: this.props.data});
    }

    onClickNext() {
        if (this.state.currentIndex == this.state.product.length - 1) {
            return;
        }
        this.setState({
            currentIndex: this.state.currentIndex + 1
        })
        this.props.clickNext(this.state.currentIndex + 1);
    };
    showResult() {
        this.props.clickNext();
        this.setState({ result: true });
    };
    onClickPrev() {
        if (this.state.currentIndex == 0) {
            return
        }
        this.setState({
            currentIndex: this.state.currentIndex - 1
        })

        this.props.clickPrevious();
    };
    handleScore = () => {
        this.setState({ score: this.state.score++ });
        // tăng điểm khi trả lời đúng
        this.props.handleScoreScreen();
    };
    isCheckAnswer = () => {
        this.props.isCheckAnswerQuestion();
    };
    render() {
        // this.setState({
        //     showNext: true
        // });
        // let showNext = true
        // function toggle(value) {
        //     console.log(this, showNext)
        //     showNext = value
        //     console.log(showNext)
        // }
        const p = this.state.product.find((prod, idx) => idx == this.state.currentIndex)
        let hienthi;
        if (p && p.type == "Quiz1") {
            hienthi = <Answer data={p} handleScore={this.handleScore} isCheckAnswer={this.isCheckAnswer}/>
            // hienthi = <Answer data={p.text} />
        }
        else if (p && p.type == "Display") {
            hienthi = <ScreenDisplay data={p} />

        }
        else if (p && p.type == "QR") {
            hienthi = <ScreenQr data={p} />
        }
        else if (p && p.type == "Audio") {
            hienthi = <Recorder data={p} />
        }
        return (

            <div className="box">

                {this.state.result ? <ScreenResult data={p} /> : <div className="h-100 d-flex flex-column">
                    <div className="flex-1">{hienthi}</div>
                    < div className="button">
                        {this.state.currentIndex == 0 ? undefined : <Button onClick={this.onClickPrev}>Previous</Button>}

                        {this.state.currentIndex < this.state.product.length - 1 ? <Button onClick={this.onClickNext}>Next</Button> : undefined}
                        {this.state.currentIndex == this.state.product.length - 1 ? <Button onClick={this.showResult}>Next</Button> : undefined}

                    </div>
                </div>
                }
            </div>
        )
    }


}
export default withRouter(ContentGame);