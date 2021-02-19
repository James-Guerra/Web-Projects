import React from "react"
import Review from "../components/Review"
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import youtubeIcon from "../images/youtube-icon.svg"
import instagramIcon from "../images/instagram-icon.svg"
function Footer() {
    return (
        <footer>
            <h2>Reviews</h2>
            <hr/>
            <div className="reviews-container">    
                <Review/>
                <Review/>
                <Review/>
                <Review/>
            </div>
            <form className="form-review">
                <h2>Write A Review</h2>
                <input placeholder="Subject"></input>
                <textarea placeholder="Your Review"></textarea>
                <button type="submit">SUBMIT REVIEW</button>
            </form>
            <div className="bottom-nav">
                <h2>Follow Us On Instagram & Youtube</h2>
                <div className="social-media-icons">
                    <img src={youtubeIcon} width="33px"></img>
                    <img src={instagramIcon} width="33px"></img>
                </div>
            </div>
        </footer>
    )
}

export default Footer