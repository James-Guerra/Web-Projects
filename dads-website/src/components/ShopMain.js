import React from "react"
import ShopNav from "../components/ShopSubHeader"
import ShopSideBar from "../components/ShopSideBar"
function ShopMain() {
    return (
        <div className="shop-main-content">
            <ShopSideBar/>
            <ShopNav/>
        </div>
    )
}

export default ShopMain