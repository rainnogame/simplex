var Description = React.createClass({
    rawMarkup: function () {
        var md = new Remarkable();
        var rawMarkup = md.render(this.props.children.toString());
        return {__html: rawMarkup};
    },
    render: function () {
        return (
            <div dangerouslySetInnerHTML={this.rawMarkup()}/>
        );

    }
});
var Task = React.createClass({
    render: function () {
        return (
            <div className="task">
                <input type="checkbox" defaultChecked={this.props.isDone ? true : false}/>
                {this.props.children}
            </div>
        );
    }
});
var TaskList = React.createClass({
    render: function () {
        var taskNodes = this.props.data.map(function (task) {
            return (
                <div key={task.id}>
                    <Task isDone={task.done}>{task.text}</Task>
                    <Description>{task.description}</Description>
                </div>
            );
        });
        return (
            <div className="task-list">
                {taskNodes}
            </div>
        );
    }
});

var TaskForm = React.createClass({
    getInitialState: function () {
        return {text: '', description: ''};
    },
    handleTextChange: function (e) {
        this.setState({text: e.target.value});
    },
    handleDescriptionChange: function (e) {
        this.setState({description: e.target.value});
    },
    render: function () {
        return (
            <form className="task-from">
                <input type="text" value={this.state.text} onChange={this.handleTextChange} placeholder="Task..."/>
                <input type="textarea" onChange={this.handleDescriptionChange} value={this.state.description}
                       placeholder="Description..."/>
                <input type="submit" value="Add"/>
            </form>
        );
    }
});
var TaskBox = React.createClass({
    loadTasksFromServer: function () {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({data: data});
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    getInitialState: function () {
        return {data: []};
    },
    componentDidMount: function () {
        this.loadTasksFromServer();
        // setInterval(this.loadTasksFromServer, this.props.pollInterval);
    },
    render: function () {
        return (
            <div className="task-box">
                <TaskForm/>
                <TaskList data={this.state.data}/>
            </div>
        );
    }
});

ReactDOM.render(
    <TaskBox pollInterval={2000} url="/todo/tasks"/>,
    document.getElementById('app-content')
);