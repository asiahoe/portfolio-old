---
layout: default
title: Jekyll Dynamic Footer
---

{% raw %}

# Jekyll Dynamic Footer

Footers often have groups of similar elements. Hand coding these can be repetitive and a pain to update. Here's how we use Jekyll and its Liquid templating system to make your footer markup more DRY and extensible.

## The Old-Fashioned Way

Uses vanilla HTML and CSS, rendering icons with the help of Font Awesome.

```html
<nav class="social">
  <ul>
    <li class="dribbble">
      <a href="https://dribbble.com/asiah">
        <i class="fa fa-dribbble fa-fw"></i> Dribbble
      </a>
    </li>
    <li class="github">
      <a href="http://github.com/asiahoe">
        <i class="fa fa-github-alt fa-fw"></i> GitHub
      </a>
    </li>
    <li class="linkedin">
      <a href="http://linkedin.com/in/asiah">
        <i class="fa fa-linkedin fa-fw"></i> LinkedIn
      </a>
    </li>
    <li class="twitter">
      <a href="http://twitter.com/asiahoe">
        <i class="fa fa-twitter fa-fw"></i> Twitter
      </a>
    </li>
  </ul>
</nav>
```

## The Dynamic Way

Since Jekyll uses the Liquid templating system, we can create data files to help us create arrays of information with repeatable formatting. Keeping the data separate from the markup not only allows us to repeat the code, but change and restyle it any way we see fit in the future.

The only caveat is that Liquid will leave spaces after compiling where code is stripped. This may add a few bits of to the filesize, and unsightly gaps when viewing the source code, but otherwise, it's not a huge problem.

### Data File

Define social networks in a data file titled social.yml. Be mindful of spacing. Tabs will throw an error, so unless your coding development translates them into spaces, avoid them.

```YAML
- network: Dribbble
  type: career
  url: https://dribbble.com/asiah

- network: Facebook
  type: personal
  url: https://www.facebook.com/asiahoe

- network: GitHub
  url: https://github.com/asiahoe
  type: career

- network: Google Plus
  fa-icon: google-plus
  type: personal
  url: https://plus.google.com/+AsiaHoe/posts

- network: Instagram
  type: personal
  url: http://instagram.com/gynesis

- network: LinkedIn
  type: career
  url: https://www.linkedin.com/in/asiah

- network: Twitter
  type: career
  url: https://twitter.com/asiahoe

- network: Twitch
  type: personal
  url: http://www.twitch.tv/gynesis
```

### Liquid HTML

Call the data from your HTML file using dynamic code. This method even includes dynamic Font Awesome support!

```HTML
<nav class="social">
  <ul>
  {% for social in site.data.social %}
  {% if social.type == "career" %}
    <li class="{{ social.network | downcase }}">
      <a href="{{ social.url }}">
        <i class="fa fa-{% if social.fa-icon == null %}{{ social.network | downcase }}{% else %}{{ social.fa-icon }}{% endif %} fa-fw"></i>
        {{ social.network }}
      </a>
    </li>
  (% endif %)
  {% endfor %}
  </ul>
</nav>
```

{% endraw %}