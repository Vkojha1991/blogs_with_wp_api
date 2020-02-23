import React from 'react';
import { Link } from "react-router-dom";

const Footer = () => {
    return (
        <footer className="footer">
            <div className="container">
            <span>Enviria</span>
                <nav>
                    <ul>
                        <li><Link to = { '/' } >Home</Link></li>
                        <li><Link to = { '/about' } >About</Link></li>
                        <li><Link to = { '/contact' } >Contact</Link></li>
                    </ul>
                </nav>
            </div>
        </footer>
    );
};

export default Footer;