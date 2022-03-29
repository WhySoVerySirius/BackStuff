<div id="content" class="mui-container-fluid">
    <div class="mui-row">
        <div class="mui-col-sm-10 mui-col-sm-offset-1">
            <br>
            <br>
            <div class="mui--text-dark-secondary mui--text-body2 indigo">QUESTION FORM</div>
            <form class="mui-form">
                <div class="mui-textfield mui-textfield--float-label">
                    <input type="text" id="questionTitle">
                    <label>Your question title</label>
                </div>
                <div class="mui-textfield mui-textfield--float-label">
                    <input type="text" id="questionBody">
                    <label>Your question body</label>
                </div>
                <button type="submit" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id="submitForm">Submit</button>
                <button type="button" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id="login">Login</button>
                <button type="submit" class="mui-btn mui-btn--raised mui--bg-color-indigo-500 mui--color-indigo-50" id='logout'>Logout</button>
                <div id="authError"></div>
            </form>
            <br>
            <br>
            <div class="mui--text-dark-secondary mui--text-body2">RECENT QUESTIONS</div>
            <div class="mui-divider"></div>
            <br>
            <div id="questions"></div>
        </div>
    </div>
</div>