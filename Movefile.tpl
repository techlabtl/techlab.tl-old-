local:
  vhost: "http://vhost.local"
  wordpress_path: "/home/xxx/techlab.tl" # use an absolute path here

  database:
    name: "techlab"
    user: "root"
    password: ""
    host: "localhost"

production:
  vhost: "http://techlab.tl"
  wordpress_path: "/var/www/techlab.tl" # use an absolute path here

  database:
    name: "techlab_tl"
    user: "techlab"
    password: "xxx"
    host: "localhost"
    # port: "3308" # Use just in case you have exotic server config

  exclude:
    - ".git/"
    - ".gitignore"
    - ".sass-cache/"
    - "bin/"
    - "tmp/*"
    - "Gemfile*"
    - "Movefile"
    - "wp-config.php"
    - "wp-content/*.sql"
    - ".ruby-gemset"
    - ".ruby-version"

  ssh:
    host: "vallestura.s.patchanka.coop"
    user: "admin"
