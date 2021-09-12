import React, {useState} from "react";
import "./post-list-item.scss";

const PostListItem = ({label, important= false, liked = false}) => {
	const [isImportant, setImportant] = useState(important);
	const [isLiked, setLiked] = useState(liked);
	let importantClasses= "btn-star btn-sm isImportant";
	let likedClasses= "btn-star btn-sm isImportant";
	if (isImportant) {
		importantClasses = "btn-star btn-sm";
	}
	if (isLiked) {
		likedClasses = "btn-sm isLiked";
	}

	const handlerImportant = (e) => {
		setImportant(!isImportant);
		e.currentTarget.classList.toggle("isImportant");
	};

	const handlerLiked = (e) => {
		setLiked(!isLiked);
		e.currentTarget.classList.toggle("isLiked");
	};

	return(
		<div className='app-list-item d-flex justify-content-between'>
			<span className="app-list-item-label">
				{label}
			</span>
			<div className="d-flex justify-content-center align-items-center">
				<button type="button" className={importantClasses} onClick={(e) => handlerImportant(e)}>
					<i className="fa fa-star"/>
				</button>
				<button type="button" className="btn-trash btn-sm">
					<i className="fa fa-trash"/>
				</button>
				<button type="button" className={likedClasses} onClick={(e) => handlerLiked(e)}>
					<i className="fa fa-bullhorn"/>
				</button>
			</div>
		</div>
	);
};

export default PostListItem;