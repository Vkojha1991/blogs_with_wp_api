import React from 'react';
import Header from './Header';
import Footer from './Footer';
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import List from './List';
import Article from './Article';
import About from './About';
import Contact from './Contact';

function App() {
  return (
            
            <Router>
                {/* Header start */}
                <Header />
                {/* Header End */}
               
                <main className="wrapper">
                    <div className="container">
                      <Switch>
                        <Route path="/" component={ List } exact />
                        <Route path="/about" component={ About } exact />
                        <Route path="/contact" component={ Contact } exact />
                        <Route path="/article/:slug" component={ Article } exact />
                      </Switch>
                    </div> 
                </main>              
              
                {/* Footer start */}
                <Footer />
                {/* Footer End */}
            </Router> 
  )
}

export default App;