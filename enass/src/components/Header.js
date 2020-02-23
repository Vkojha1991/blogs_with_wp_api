import React from 'react';
import { Link, NavLink } from "react-router-dom";

const Header = () => {
    return (
        <header className="header">
            <div className="container v-center">

                <Link className="logo" to={`/`}>Enviria</Link>

                <nav>
                    <ul>
                        <li><NavLink exact to = { '/' } activeClassName="active">Home</NavLink></li>
                        <li><NavLink exact to = { '/about' } activeClassName="active">About</NavLink></li>
                        <li><NavLink exact to = { '/contact' } activeClassName="active">Contact</NavLink></li>
                    </ul>
                </nav>
            </div>
        </header>
    );
};

export default Header;