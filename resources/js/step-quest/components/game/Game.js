import React, { Component } from "react";
import ContentGame from "../Home/ContentGame";
import { FaBars, FaStar } from "react-icons/fa";
import { Progress } from 'antd';
import 'antd/dist/antd.css';
import './Game.css';
import { Dropdown } from "react-bootstrap";
class Game extends Component {
    constructor(props) {
        super(props);
        this.state = {
            score: 0,
            step: 0,
            currentStep: 0,
            sumStep: 1,
            width: 100,
            backgroundColor: 'green',
            interval: null
        };
        this.isCheck = false;
        this.timeLeft = 10;
        this.allTime = 10;

        this.interval = undefined;

    }

    componentDidMount() {
        this.setState({ sumStep: this.props.data.items.length });
        this.startTime(this.props.data.items[0].time, 0);
    }

    startTime(timeOfQuestion, i) {
        var me = this;
        this.setState({
            width: 100,
            backgroundColor: 'green'
        });
        this.timeLeft = timeOfQuestion;
        this.allTime = timeOfQuestion;
        clearInterval(this.interval);
        this.interval = setInterval(() => {
            me.timeLeft = me.timeLeft - 0.1;
            var width = me.timeLeft * 100 / me.allTime;
            if (me.timeLeft < 0) {
                this.props.data.items[i].fulltime = true;
            }
            me.setState({
                width: width,
                backgroundColor: width > 40 ? 'green' : 'red'
            });
        }, 100);
    }

    handleScore = () => {
        var currentScore = this.state.score;
        
        this.setState({ score: currentScore + 1 });
    }
    handleStepNext = (data) => {
        if (!this.props.data.items[data].isCheck) {
            this.isCheck = false;
            this.props.data.items[data].isCheck = true;
            this.startTime(this.props.data.items[data].time, data);
            const currentStep = this.state.step;
            this.setState({
                step: currentStep + 1,
            });

            setTimeout(() => {
                if (this.state.step > this.state.currentStep) {
                    this.setState({
                        currentStep: currentStep + 1,
                    });
                }
            }, 200);
        }
        else {
            this.isCheck = true;
        }
    }
    handleStepPrevous = () => {
        var step = this.state.step;
        this.isCheck = true;
        this.setState({ step: step - 1 });
    }

    checkAnswer = ()=> {
        this.isCheck = true;
        clearInterval(this.interval);
    }

    render() {
        const progressStep = this.state.currentStep * 100 / this.state.sumStep;
        return (
            <div className="h-100 Game">
                <div className="headerGame">
                    <Dropdown>
                        <Dropdown.Toggle variant="success" id="dropdown-basic">
                            <FaBars />
                        </Dropdown.Toggle>

                        <Dropdown.Menu>
                            <Dropdown.Item href="/step-quest">Chơi lại</Dropdown.Item>
                            <Dropdown.Item href="/step-quest/resgister">Thoát game</Dropdown.Item>

                        </Dropdown.Menu>
                    </Dropdown>

                    <Progress percent={progressStep} />
                    <div className="score">{this.state.score}</div>
                    <FaStar className="star" />

                </div>
                <div className="time">
                    {!this.isCheck ? <div className="timeleft" style={{ width: this.state.width + '%', background: this.state.backgroundColor }}
                    ></div> : null}
                </div>

                <div className="content">
                    <ContentGame data={this.props.data.items} handleScoreScreen={this.handleScore} isCheckAnswerQuestion={this.checkAnswer} clickPrevious={this.handleStepPrevous} clickNext={this.handleStepNext} />
                </div>
            </div>

        )
    }
}
export default Game;