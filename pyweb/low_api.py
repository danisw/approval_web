from smartcard.Exceptions import NoCardException
from smartcard.System import *
from smartcard.util import HexListToBinString, toHexString, toBytes
from smartcard.scard import *
from flask_socketio import SocketIO


def read_uid():
	COMMAND = [0xFF, 0xCA, 0x00, 0x00, 0x00]
	hresult, hcontext = SCardEstablishContext(SCARD_SCOPE_USER)
	hresult, readers = SCardListReaders(hcontext, [])
	reader = readers[0]
	hresult, hcard, dwActiveProtocol = SCardConnect(hcontext, reader,
	                SCARD_SHARE_SHARED, SCARD_PROTOCOL_T0 | SCARD_PROTOCOL_T1)
	try:
		hresult, response = SCardTransmit(hcard, dwActiveProtocol,
		                    COMMAND)
		data=toHexString(response)
		datah=data.strip( ' 90' )
	except:
		datah="No Card"
		

	return datah

