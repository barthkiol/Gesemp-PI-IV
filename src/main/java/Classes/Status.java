package Classes;

public enum Status {

	PENDENTE (1), 
	APROVADO (2), 
	AGUARDANDO_PAGAMENTO (3), 
	PAGO (4), 
	FATURADO (5), 
	ENTREGUE (6), 
	CANCELADO (7), 
	ESTORNADO (8);

	private int codigo;
	Status(int i) {
		// TODO Auto-generated constructor stub
		this.codigo = i;
	}
	public int getCodigo() {
		return codigo;
	}
	public void setCodigo(int codigo) {
		this.codigo = codigo;
	}
	
	
	
}
