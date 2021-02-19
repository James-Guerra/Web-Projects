import React from "react"
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import conga1 from "../images/refurbished-1.jpg"
import conga2 from "../images/refurbished-2.jpeg"
import conga3 from "../images/refurbished-3.jpeg"
function Body() {
    const styles = {
        ownerImage: {
            width: "100%",
            height: "300px",
            padding: "30px",
            zIndex: 0,
        }
    }
    return (
        <>
            <section class="main-background-container">
                <div className="main-background">
                </div>
                <div>
                    <p className="large-title">SC DRUM CO.</p>
                </div>
            </section>
            <section className="founders-section">
                <h2>the founders</h2>
                <hr />
                <div className="owners">
                    <div className="owner">
                        <FontAwesomeIcon icon="user" style={styles.ownerImage} />
                        <div className="owner-details">
                            <p>Eddie - something about him</p>
                        </div>
                    </div>
                    <div className="owner">
                        <FontAwesomeIcon icon="user" style={styles.ownerImage} />
                        <div className="owner-details">
                            <p>Antonio - something about him</p>

                        </div>
                    </div>
                    <div className="owner">
                        <FontAwesomeIcon icon="user" style={styles.ownerImage} />
                        <div className="owner-details">
                            <p>Luis - something about him</p>
                        </div>
                    </div>
                </div>
            </section>
            <section className="mission">
                <h2>our mission</h2>
                <hr />
                <div className="mission-content">
                    <div className="mission-item item1" style={{marginTop:0}}>
                        <div>
                            <img src={conga1}></img>
                        </div>
                        <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
                    </div>
                    <div className="mission-item item2">
                        <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
                        <div>
                            <img src={conga2}></img>
                        </div>
                    </div>
                    <div className="mission-item item3">
                        <img src={conga3}></img>
                        <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>

                    </div>
                </div>
            </section>
        </>
    )
}

export default Body