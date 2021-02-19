import React from "react"
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome"
function ShopSubHeader() {
    return (
        <div className="shop-sub-header">
            <form>
                <input placeholder="Search Products"></input>
            </form>
            <div className="shop-sub-header-icons">
                <li><FontAwesomeIcon icon="user"/></li>
                <li><FontAwesomeIcon icon="shopping-bag"/></li>
            </div>
        </div>
    )
}

export default ShopSubHeader