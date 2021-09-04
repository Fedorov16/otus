import React from "react";
import "./post-list-item.scss";

const PostListItem = () => {
	return(
		<li className="app-list-item d-flex justify-content-between">
			<span className="app-list-item-label">
                hello world
			</span>
			<div className="d-flex justify-content-center align-items-center">
				<button type="button" className="btn-star btn-sm">
					<i className="fa fa-star"/>
				</button>
				<button type="button" className="btn-trash btn-sm">
					<i className="fa fa-trash"/>
				</button>
				<button type="button" className="btn-bullhorn btn-sm">
					<i className="fa fa-bullhorn"/>
				</button>
			</div>
		</li>
	);
};

export default PostListItem;