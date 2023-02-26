## Lightning Decoder API

A simple api to return a decoded lightning invoice object based on a payment request string GET request.

### Usage

```sh
GET http://localhost/api/decode/bolt11/lnbc1...
```

#### Response

```json
{
    "satsoshis": 967878,
    "millisatoshis": 967878534,
    "expiry_datetime": {
        "date": "2019-11-06 20:51:43.000000",
        "timezone_type": 1,
        "timezone": "+00:00"
    },
    "expiry_timestamp": 1573073503,
    "network": {},
    "payee_node_key": "03e7156ae33b0a208d0744199163177e909e80176e55d97a2f221ede0f934dd9ad",
    "prefix": "lnbc9678785340p",
    "recovery_flag": 1,
    "signature": "9bfc45a06630bad2df1532e3beba5259c534b0e614310f3dfe615172ca9a2ff33c1ba736792158d07f3bbed8bdfcf5913d5ce4dda1b5575aa00cd6e23aef86f5",
    "timestamp": 1572468703,
    "timestamp_datetime": {
        "date": "2019-10-30 20:51:43.000000",
        "timezone_type": 1,
        "timezone": "+00:00"
    }
}
```

### Installation

```sh
git clone https://github.com/utxo-one/lightning-decoder
```

```sh
composer update
```

```sh
sudo ./vendor/bin/sail up -d
```

Visit http://localhost/api/decode/bolt11/YOUR-LN-INVOICE-HERE
