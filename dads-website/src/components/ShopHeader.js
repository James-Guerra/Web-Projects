import React from "react"
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome"
import congaIcon from "../images/conga-icon.png";
import {Link} from "react-router-dom"
function ShopHeader() {
    return(
        <div className="shop-header">
            <div className="logo-container">
                <img src={congaIcon} alt="hi"></img>
                <h3 className="title">SC Drum Co.</h3>
            </div>
            <div className="nav-links">
                <li><Link to="/">Home</Link></li>
                <li><Link to="gallery">Gallery</Link></li>
                <li><Link to="shop">Shop</Link></li>
                <li><Link to="contactus">Contact Us</Link></li>
            </div>
        </div>
    )
}

export default ShopHeader