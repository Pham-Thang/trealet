import axios from "axios";
import React, { Component } from "react";
import { withRouter } from "react-router-dom";
import { Button } from "react-bootstrap";
import Game from "../../game/Game";
import { FaAngleLeft } from "react-icons/fa";
import BtnBack from "./BtnBack";
import "./GameIntro.css";
class GameIntro extends Component {
  constructor(props) {
    super(props);
    this.state = {
      game: undefined,
      showGameDetail: false,
    };
  }
  componentDidMount() {
    this.getProductData();
  }
  getProductData() {
    if (this.props.match && this.props.match.params) {
      let id = this.props.match.params.id;
      axios
        .get(`http://127.0.0.1:8000/api/trealets/stepquest/${id}`)
        .then((response) => {
          var data = response.data?.data?.json?.trealet;
          this.setState({ game: data });
          this.handleClick()
        });
    }
  }

  handleClick = () => {
    this.setState({
      showGameDetail: true,
    });
  };
  render() {
    return (
      <div className="flex-1 introgames">
        {" "}
        {!this.state.showGameDetail ? (
          <div className="game-detail w-full">
            <div className="d-flex title">
              <BtnBack />
              <div> {this.state.game ? this.state.game.title : ""} </div>{" "}
            </div>{" "}
            <div className="description">
              {" "}
              {this.state.game ? this.state.game.des : ""}{" "}
            </div>{" "}
            <Button onClick={this.handleClick}> Bắt đầu </Button>{" "}
          </div>
        ) : (
          <Game data={this.state.game} />
        )}{" "}
      </div>
    );
  }
}
export default GameIntro;
