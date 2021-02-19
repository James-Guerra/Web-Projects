import React from "react"
import Header from "../components/Header"
import image1 from "../images/gallery-dummy-1.jpeg"
import image2 from "../images/gallery-dummy-2.jpeg"
import image3 from "../images/gallery-dummy-3.jpeg"
import image4 from "../images/gallery-dummy-4.jpeg"
import GalleryItem from "../components/GalleryItem"
function Gallery() {
    return (
        <>
            <Header/>
            <section className="gallery-container">
                <div className="gallery-header">
                    <h1>Gallery</h1>
                    <div>
                        <button>Photos</button>
                        <button>Videos</button>
                    </div>
                </div>
                <section className="gallery">
                    <GalleryItem image={image1}/>
                    <GalleryItem image={image2}/>
                    <GalleryItem image={image3}/>
                    <GalleryItem image={image4}/>
                    <GalleryItem image={image1}/>
                    <GalleryItem image={image2}/>
                    <GalleryItem image={image3}/>
                    <GalleryItem image={image4}/>
                    <GalleryItem image={image1}/>
                    <GalleryItem image={image2}/>
                    <GalleryItem image={image3}/>
                    <GalleryItem image={image4}/>
                    <GalleryItem image={image1}/>
                    <GalleryItem image={image2}/>
                    <GalleryItem image={image3}/>
                    <GalleryItem image={image4}/>
                </section>
            </section>
            
        </>
    )
}

export default Gallery