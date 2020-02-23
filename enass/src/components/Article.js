import React, { Component, Fragment } from 'react';
import { Link } from "react-router-dom";

//var base_url = window.location.origin;
var base_url = `http://localhost/assignment/api/`;

class Article extends Component {
    constructor(props) {
        super(props);
        this.state = {
            post:[]
        };
    }


    componentDidMount() {
        const slug = this.props.match.params.slug;
        fetch(`${ base_url }/wp-json/wp/v2/posts?_embed&slug=${slug}`)
        .then(response => {
            response.json().then(data => {
                if (data.length > 0) {
                    this.setState({
                        post: data
                    });
                }
            });
        });
    }

    render() {
        console.log(this.state.post)
        return (
            <Fragment>
                {
                    this.state.post.map((el, i) =>(
                        <article kye={i} className="details-view">
                            <h1 className="details-view_title">{el.title.rendered}</h1>
                            <figure><img src = { el._embedded["wp:featuredmedia"][0].source_url } alt="img" /></figure>
                            <div className="details-view_content" dangerouslySetInnerHTML= {{ __html: el.content.rendered }} />
                        </article>
                    ))
                }
                <Link className="btn btn-blog" to={`/`}>Go to blogs</Link>
            </Fragment>
        );
    }
}

export default Article;