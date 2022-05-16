import { Progress } from "antd";
import "antd/dist/antd.css";
import React, { Component } from "react";
import { Dropdown } from "react-bootstrap";
import { FaBars, FaStar } from "react-icons/fa";
import ContentGame from "../Home/ContentGame";
import "./Game.css";

class Game extends Component {
  constructor(props) {
    super(props);
    this.state = {
      score: 0,
      currentStep: 0,
      sumStep: 1,
      width: 100,
      backgroundColor: "green",
      interval: null,
      bonusScore: 0,
      showBonusScore: false,
      bonusScorePositionBottom: "50%",
      musicStatus: props.musicStatus
    };
    this.step = 0;
    this.isCheck = false;
    this.timeLeft = 10;
    this.allTime = 10;
    this.interval = undefined;
    let self = this
    setInterval(function() {
      if (localStorage.getItem("current")) {
        clearInterval(self.interval)
      }
    }, 1000)
  }

  componentDidMount() {
    this.setState({ sumStep: this.props.data.items.length });
    this.startTime(this.props.data.items[0].time, 0);
  }

  changemusicStatus = () => {
    const me = this
    const audioEle = document.getElementById("backgroundMusic")
    const currentState = me.state.musicStatus

    if (currentState) {
      audioEle?.pause()
    } else {
      audioEle?.play()
    }
    me.setState({musicStatus: !currentState})
  }

  startTime(timeOfQuestion, i) {
    var me = this;
    this.setState({
      width: 100,
      backgroundColor: "green",
    });
    this.timeLeft = timeOfQuestion;
    this.allTime = timeOfQuestion;
    clearInterval(this.interval);
    this.interval = setInterval(() => {
      me.timeLeft = me.timeLeft - 0.1;
      var width = (me.timeLeft * 100) / me.allTime;
      if (me.timeLeft < 0) {
        this.props.data.items[i].fulltime = true;
      }
      me.setState({
        width: width,
        backgroundColor: width > 50 
          ? "green" 
          : width > 25
            ? "orange"
            : "red",
      });
    }, 100);
  }

  handleScore = (data) => {
    var currentScore = this.state.score;
    this.setState({ score: currentScore + data, showBonusScore: true, bonusScore: data, bonusScorePositionBottom: "50%" });

    
    setTimeout(() => {
      this.setState({ bonusScorePositionBottom: "80%" });
      setTimeout(() => {
        this.setState({ showBonusScore: false});
      }, 500)
    }, 100);
  };
  handleStepNext = (data) => {
    // màn tiếp theo
    if (this.props.data.items[data] && !this.props.data.items[data].isCheck) {
      this.isCheck = false;
      this.props.data.items[data].isCheck = true;
      // this.startTime(this.props.data.items[data].time, data);
      this.startTime(parseInt(this.props.data.items[data].time), data);
    } else {
      this.isCheck = true;
    }

    this.step++;

    if (this.step > this.state.currentStep) {
      var currentScore = this.state.score;
      let newScore = currentScore
      let prevQuestion = this.props.data.items[data - 1]
      if (prevQuestion && !prevQuestion.fulltime) {
        let anwser = localStorage.getItem("current")
        console.log(anwser, prevQuestion)
        if (prevQuestion.type == "QR") {
          if(anwser == prevQuestion.code) {
            newScore =
              Number(currentScore) +
              Number(prevQuestion.score);  
          }
        }else if (prevQuestion.type == "Audio" || prevQuestion.type == "Picture") {
          if(anwser == 1) {
            newScore =
              Number(currentScore) +
              Number(prevQuestion.score);
          }
        }else if (prevQuestion.type == "Display") {
          newScore =
            Number(currentScore) +
            Number(prevQuestion.score);
        }
      }
      localStorage.removeItem("current")

      this.setState({
        currentStep: this.step,
      });
      if (newScore !== currentScore) {
        this.handleScore(newScore - currentScore)
      }
    }
  };
  handleStepPrevous = () => {
    this.isCheck = true;
    this.step--;
  };

  checkAnswer = () => {
    this.isCheck = true;
    clearInterval(this.interval);
  };

  render() {
    const me = this
    const progressStep = (this.state.currentStep * 100) / this.state.sumStep;
    return (
      <div className="h-100 Game">
        <div className="headerGame">
          <audio id="backgroundMusic" autoPlay={this.props.musicStatus}>
            <source src="../../assets/audio/wemida-waiting-for-the-end-quizzing-voting-background-music-16575.mp3" type="audio/mp3" />
          </audio>
          <Dropdown>
            <Dropdown.Toggle variant="success" id="dropdown-basic">
              <FaBars />
            </Dropdown.Toggle>{" "}
            <Dropdown.Menu>
              <Dropdown.Item onClick={me.changemusicStatus}> Nhạc: {me.state.musicStatus ? " bật" : " tắt"} </Dropdown.Item>
              <Dropdown.Item href="/"> Thoát Game </Dropdown.Item>
            </Dropdown.Menu>{" "}
          </Dropdown>{" "}
          <Progress percent={progressStep} />{" "}
          <div className="score"> {this.state.score} </div>{" "}
          <FaStar className="star" />
        </div>{" "}
        <div className="time">
          {" "}
          {!this.isCheck ? (
            <div
              className="timeleft"
              style={{
                width: this.state.width + "%",
                background: this.state.backgroundColor,
              }}
            ></div>
          ) : null}{" "}
        </div>{" "}
        <div className="content">
          <ContentGame
            score={{score: this.state.score}}
            data={this.props.data.items}
            minScore={this.props.data.minScore} 
            gift={this.props.data.gift}
            handleScoreScreen={this.handleScore}
            isCheckAnswerQuestion={this.checkAnswer}
            clickPrevious={this.handleStepPrevous}
            clickNext={this.handleStepNext}
          />{" "}
        </div>{" "}
        {
          this.state.showBonusScore ? 
          <div className="animation-score" id="bonus-score" style={{bottom: this.state.bonusScorePositionBottom}}>
            <div className="score"> {"+" + this.state.bonusScore} </div>{" "}
            <FaStar className="star" />
          </div>
          : ""
        }
        
      </div>
    );
  }
}
export default Game;
