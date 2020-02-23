import React, { Component, Fragment } from 'react';
import { Link } from "react-router-dom";

//var base_url = window.location.origin;
var base_url = `http://localhost/assignment/api/`;

class List extends Component {
    constructor(props) {
        super(props);
        this.state = {
            posts: [],
            currentPage:1,
            postsPerPage:3,
            activeLink:1
        };
        this.handleClick = this.handleClick.bind(this);
    }

    componentDidMount() {
        fetch(`${ base_url }/wp-json/wp/v2/posts?_embed`)
        .then(response => {
            response.json().then(data => {
                if (data.length > 0) {
                    this.setState({
                        posts: data,
                    });
                }
            });
        });
    }


    handleClick(event) {
        this.setState({
          currentPage: Number(event.target.id),
          activeLink: Number(event.target.id)
        });
    }

    render() {

        // Get current posts
        const { posts, currentPage, postsPerPage, activeLink } = this.state;

        const indexOfLastPost = currentPage * postsPerPage;
        const indexOfFirstPost =  indexOfLastPost - postsPerPage;
        const currentPosts = posts.slice(indexOfFirstPost, indexOfLastPost);

        const renderPosts = currentPosts.map((el, i) => {

            return (
                    <article key={ i } className="article-list_view">
                        <figure><img src = { el._embedded["wp:featuredmedia"][0].source_url } alt="img" /></figure>
                        <h2>{ el.title.rendered }</h2>
                        <div dangerouslySetInnerHTML= {{ __html: el.excerpt.rendered }} />
                        <Link className="btn" to={`/article/${el.slug}`}>Read More...</Link>
                    </article>
            )
        })

        const pageNumbers = [];
            for (let i = 1; i <= Math.ceil(posts.length / postsPerPage); i++) {
            pageNumbers.push(i);
        }

        const renderPageNumbers = pageNumbers.map(number => {
            return (
              <li key={number} ><Link id={number} onClick={this.handleClick } className={ (number === activeLink ? " activePage" : "") }> { number } </Link> </li>
            );
        });

        

        return (
            <Fragment>
                    <h1 className="list-view">Blogs</h1>
                    <section className="article-list">
                        { renderPosts }
                    </section>
                    <ul className="pagination">
                        {renderPageNumbers}
                    </ul>
            </Fragment>
        );
    }
}

export default List;