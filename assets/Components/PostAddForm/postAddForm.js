import React, {useState} from "react";
import "./post-add-form.scss";
import PropTypes from "prop-types";

const PostAddForm = ({onSubmit}) => {

	const [itemMessage, setItemMessage] = useState("");

	const onFormSubmit = (e) => {
		e.preventDefault();
		onSubmit(itemMessage);
		setItemMessage("");
	};
	const handleOnChange = (e) => {
		setItemMessage(e.target.value);
	};

	return(
		<form
			className="bottom-panel d-flex"
			onSubmit={onFormSubmit}
		>
			<input
				type="text"
				placeholder="What are you thinking about"
				className="form-control new-post-label"
				onChange={(e) => handleOnChange(e)}
				value={itemMessage}
			/>
			<button
				type="submit"
				className="btn-outline-secondary"
			>
                Add post
			</button>
		</form>
	);
};

PostAddForm.propTypes = {
	onSubmit: PropTypes.func
};

export default PostAddForm;