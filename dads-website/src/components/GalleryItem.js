import React from "react"
import Gallery from "../Pages/Gallery"

function GalleryItem(props) {
    return (
        <div className="gallery-item">
            <img src={props.image}></img>
        </div>
    )
}

export default GalleryItem