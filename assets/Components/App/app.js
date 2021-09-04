import React from "react";
import Header from "../Header";
import SearchPanel from "../SearchPanel";
import PostStatusFilter from "../PostStatusFilter";
import PostList from "../PostList";
import PostAddForm from "../PostAddForm";
import "./app.scss";

const App = () => {
	return (
		<div className="app">
			<Header/>
			<div className="search-panel d-flex">
				<SearchPanel/>
				<PostStatusFilter/>
			</div>
			<PostList/>
			<PostAddForm/>
		</div>
	);
};

export default App;
