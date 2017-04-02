# Robo GitHub

Run GitHub commands from the Robo task runner.

### Getting Started

First, you'll need to download the Robo GibHub library using composer:

```bash
composer require droath/robo-github:~0.0.1
```

Next, you'll need to create a personal access token on GitHub so you have access to your private repositories via a Robo task. Follow this [GitHub guide](https://help.github.com/articles/creating-a-personal-access-token-for-the-command-line/) to obtain your access token.

Once you've created your GitHub token you'll need to pass the access token along with the GitHub project user or organization and repository name, like the following:

```php
<?php
    $token = 'OJuJcqaYiX5uL72Ky';
    $account = 'droath';
    $repository = 'robo-github';

    $response = $this
        ->taskGitHubIssueAssignees($token, $account, $repository)
        ...
        ...
        ->run();

    var_dump($response);
```

The GitHub account and repository arguments can also be defined using the set methods:

```php
<?php
    $response = $this
        ->taskGitHubIssueAssignees('OJuJcqaYiX5uL72Ky')
        ->setAccount('droath')
        ->setRepository('robo-github')
        ...
        ->run();

    var_dump($response);
```

### Example

**Retrieve GitHub issues:**

```php
<?php
    $issues = $this->taskGitHubIssueList('OJuJcqaYiX5uL72Ky')
        ->setAccount('droath')
        ->setRepository('robo-github')
        ->filter('assigned')
        ->state('opened')
        ->labels(['bug', 'duplicates'])
        ...
        ->run();

    var_dump($issues);
```

**Assign a GitHub issue:**

```php
<?php
    // The GitHub issue number.
    $number = 6;

    // The GitHub user name to assign the issue too.
    $assignee = 'droath';

   $response = $this->taskGitHubIssueAssignees('OJuJcqaYiX5uL72Ky')
        ->setAccount('droath')
        ->setRepository('robo-github')
        ->number($number)
        ->addAssignee($assignee)
        ->run();
```

### Support

I'll be adding more GitHub commands as they're needed. Feel free to create a PR or an issue with any problems you're having.
