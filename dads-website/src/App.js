import './App.css';
import "./components/FontAwesomeIcons"

import { Route, Switch, BrowserRouter as Router} from 'react-router-dom'
import Gallery from "./Pages/Gallery"
import Home from "./Pages/Home"
import ContactUs from "./Pages/ContactUs"
import Shop from "./Pages/Shop"

function App() {
  return (
    <Router>
      <Route path="/" exact component={Home}/>
      <Route path="/gallery" component={Gallery}/>
      <Route path="/shop" component={Shop}/>
      <Route path="/contactus" component={ContactUs}/>
    </Router>
  );
}

export default App;
