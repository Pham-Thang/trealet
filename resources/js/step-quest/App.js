import './App.css';
import {
  BrowserRouter as Router, Link, Route, Switch
} from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.min.css';
import ListMuseum from './components/Museum/ListMuseum';
import GameIntro from './components/Screen/AboutGame/GameIntro';
function App() {
  return (
    <div className="App">
      <Router>
        <Switch>
          {/* route đến màn danh sách bảo tàng */}
          
          <Route path="/step-quest/game/:id" component = {GameIntro} />
          <Route path="/step-quest" component = {ListMuseum} />
        </Switch>
    </Router>
    </div>
  );
}
export default App;

