import React, { Component } from "react";
import { Button } from "react-bootstrap";
import { withRouter } from "react-router-dom";
import ScreenDisplay from "../Screen/Display/ScreenDisplay";
import ScreenPicture from "../Screen/Picture/Picture";
import ScreenQr from "../Screen/Qr/ScreenQr";
import Answer from "../Screen/Question/Answer";
import Recorder from "../Screen/Recorder/Recorder";
import ScreenResult from "../Screen/Result/ScreenResult";
// import App from "../../App";
import "./Game.css";
class ContentGame extends Component {
  constructor(props) {
    super(props);
    this.state = {
      // isShow : false
      product: [],
      result: false,
    };
    this.onClickNext = this.onClickNext.bind(this);
    this.onClickPrev = this.onClickPrev.bind(this);
    this.showResult = this.showResult.bind(this);
    this.currentIndex = 0;
    this.score = 0;
  }
  componentDidMount() {
    this.setState({ product: this.props.data });
  }

  onClickNext() {
    if (this.currentIndex == this.state.product.length - 1) {
      return;
    }
    this.currentIndex += 1;

    this.props.clickNext(this.currentIndex);
  }
  showResult() {
    this.currentIndex += 1;
    this.props.clickNext(this.currentIndex);
    this.setState({ result: true });
  }
  onClickPrev() {
    if (this.currentIndex == 0) {
      return;
    }
    this.currentIndex--;

    this.props.clickPrevious();
  }
  handleScore = (data) => {
    // tăng điểm khi trả lời đúng
    console.log("hadnadsasd")
    this.props.handleScoreScreen(data);
  };
  isCheckAnswer = () => {
    this.props.isCheckAnswerQuestion();
  };
  render() {
    const p = this.state.product.find((prod, idx) => idx == this.currentIndex);
    let hienthi;
    if (p && p.type == "Quizz") {
      hienthi = (
        <Answer
          data={p}
          handleScore={this.handleScore}
          isCheckAnswer={this.isCheckAnswer}
        />
      );
      // hienthi = <Answer data={p.text} />
    } else if (p && p.type == "Display") {
      hienthi = <ScreenDisplay data={p} />;
    } else if (p && p.type == "QR") {
      hienthi = <ScreenQr data={p} />;
    } else if (p && p.type == "Audio") {
      hienthi = <Recorder data={p} />;
    } else if (p && p.type == "Picture") {
      hienthi = <ScreenPicture data={p} />;
    }
    return (
      <div className="box">
        {this.state.result ? (
          <ScreenResult data={this.props.score} />
        ) : (
          <div className="h-100 d-flex flex-column">
            {" "}
            <div className="flex-1"> {hienthi} </div>{" "}
            <div className="button">
              {" "}
              {this.currentIndex == 0 ? undefined : (
                <Button onClick={this.onClickPrev} className="btn-reverse"> Quay lại </Button>
              )}
              {this.currentIndex < this.state.product.length - 1 ? (
                <Button onClick={this.onClickNext}> Tiếp tục </Button>
              ) : undefined}{" "}
              {this.currentIndex == this.state.product.length - 1 ? (
                <Button onClick={this.showResult}> Tiếp tục </Button>
              ) : undefined}
            </div>{" "}
          </div>
        )}{" "}
      </div>
    );
  }
}
export default withRouter(ContentGame);
