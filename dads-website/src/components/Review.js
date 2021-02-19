import React from "react";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome"

function Review() {
    return (
        <div>
            <div className="review">
                <h3>Amazing</h3>
                <hr/>
                <div className="rating">
                    <div>
                        <FontAwesomeIcon icon="star"/>
                        <FontAwesomeIcon icon="star"/>
                        <FontAwesomeIcon icon="star"/>
                        <FontAwesomeIcon icon="star"/>
                        <FontAwesomeIcon icon="star"/>
                    </div>
                    <p> - 5 star</p>
                </div>
                <p>Something about how well the customer service is, etc.</p>
            </div>
        </div>
    )
}

export default Review